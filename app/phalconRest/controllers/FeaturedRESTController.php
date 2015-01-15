<?php
namespace PhalconRest\Controllers;
use \PhalconRest\Exceptions\HTTPException;

/**
 * Base RESTful Controller.
 * Supports queries with the following paramters:
 *   Searching:
 *     q=(searchField1:value1,searchField2:value2)
 *   Partial Responses:
 *     fields=(field1,field2,field3)
 *   Limits:
 *     limit=10
 *   Partials:
 *     offset=20
 *
 */
class FeaturedRESTController extends \PhalconRest\Controllers\RESTController{

    /**
     * @return array of models
     */
    public function search($model){
        return $this->searchWithParams($model, null);
    }

    /**
     * @return array of models
     */
    public function searchWithParams($model, $params){
        $results = array();
        $criteriaString = null;

        if (sizeof($this->searchFields) > 0) {
            $criteriaString = '1=1';
            foreach ($this->searchFields as $field => $value) {
                $criteriaString .= ' AND ' . $field . ' = "' . $value . '" ';
            }
        }

        $queryConfig = $this->prepareQueryConfig($model, $criteriaString, $params);

        $candidates = $model::find($queryConfig);

        foreach ($candidates as $candidate) {
            $results[] = $candidate;
        }

        return $results;
    }

    /**
     * @param $model
     * @param $criteriaString
     * @param $params
     * @return array
     */
    private function prepareQueryConfig($model, $criteriaString, $params)
    {
        $queryConfig = (!$params) ? array($criteriaString) : array_merge(array($criteriaString), $params);

        // Auto-sorting via column order_number
        // old dirty meta data hack XD
        if (!isset($queryConfig['order']) && in_array('order_number', $this->getModelAttributes($model))) {
            $queryConfig['order'] = 'order_number';
        }

        return $queryConfig;
    }

    private function getModelAttributes($model) {
        $mockModel = new $model();
        $metaData = $mockModel->getModelsMetaData();
        $attributes = $metaData->getAttributes($mockModel);

        return $attributes;
    }

    private function cleanResults($results, $attributes)
    {
        $cleanedResults = array();
        foreach($results as $record){
            $cleanedResult = array();
            foreach($attributes as $attribute) {
                $cleanedResult[$attribute] = $record->$attribute;
            }
            $cleanedResults[] = $cleanedResult;
        }

        return $cleanedResults;
    }

    public function respond($results){
        if (sizeof($results) === 0)
            return array();

        $attributes = $results[0]->getModelsMetaData()->getAttributes($results[0]);
        $preparedResults = $this->cleanResults($results, $attributes);

        if($this->isPartial){
            $newResults = array();
            foreach($preparedResults as $record){
                $cleanedResult = array();
                foreach($this->partialFields as $partialField) {
                    $cleanedResult[$partialField] = $record[$partialField];
                }
                $newResults[] = $cleanedResult;
            }

            $preparedResults = $newResults;
        }
        if($this->offset){
            $preparedResults = array_slice($preparedResults, $this->offset);
        }
        if($this->limit){
            $preparedResults = array_slice($preparedResults, 0, $this->limit);
        }

        return $preparedResults;
    }

    private function array_remove_keys($array, $keys = array()) {

        // If array is empty or not an array at all, don't bother
        // doing anything else.
        if(empty($array) || (! is_array($array))) {
            return $array;
        }

        // At this point if $keys is not an array, we can't do anything with it.
        if(! is_array($keys)) {
            return $array;
        }

        // array_diff_key() expected an associative array.
        $assocKeys = array();
        foreach($keys as $key) {
            $assocKeys[$key] = true;
        }

        return array_diff_key($array, $assocKeys);
    }

}