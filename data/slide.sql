BEGIN;

CREATE TABLE "slide"(
	"id" Integer PRIMARY KEY AUTOINCREMENT,
	"path" Text,
	"templateUrl" Text,
	"controller" Text,
CONSTRAINT "unique_id" UNIQUE ( "id" ),
CONSTRAINT "unique_path" UNIQUE ( "path" ),
CONSTRAINT "unique_templateUrl" UNIQUE ( "templateUrl" ) );

-- Create index index_id
CREATE INDEX "index_id" ON "slides"( "id" );
BEGIN;



END;


-- Create index index_path
CREATE INDEX "index_path" ON "slides"( "path" );
BEGIN;



END;


-- Create index index_templateUrl
CREATE INDEX "index_templateUrl" ON "slides"( "templateUrl" );
BEGIN;



END;


-- Create property layout
INSERT INTO sqlite_vs_properties( parentType, parentName, propertyName, propertyValue ) VALUES ( 'table','"slide"','layout','<?xml version="1.0" encoding="utf-8"?>
<properties>
	<Default>
		<FilterFavorite value=""/>
		<FilterRecent value=""/>
		<Pictures value="0"/>
		<Widths value="Y29udHJvbGxlcg== 192
aWQ= 64
cGF0aA== 192
dGVtcGxhdGVVcmw= 192
"/>
	</Default>
</properties>

');

END;



INSERT INTO 'slide' ('controller', 'path', 'templateUrl')
SELECT 'SlideController' AS 'controller', 'intro' AS 'path', '01_intro.html' AS 'templateUrl'
UNION SELECT 'SlideController', 'proven', '03_proven.html'
UNION SELECT 'SlideController', 'code_organization', '04_code_organization.html'
UNION SELECT 'SlideController', 'piles_on_floor', '05_piles_on_floor.html'
UNION SELECT 'SlideController', 'socks_drawer', '06_socks_drawer.html'
UNION SELECT 'SlideController', 'modularity', '07_modularity.html'
UNION SELECT 'SlideController', 'keep_controllers_simple', '08_keep_controllers_simple.html'
UNION SELECT 'SlideController', 'class_approach', '09_class_approach.html'
UNION SELECT 'SlideController', 'inheritance_pattern', '10_inheritance_pattern.html'
UNION SELECT 'SlideController', 'scope_uncluttered', '11_scope_uncluttered.html'
UNION SELECT 'SlideController', 'directive_needed', '12_directive_needed.html'
UNION SELECT 'SlideController', 'business_logic', '13_business_logic.html'
UNION SELECT 'SlideController', 'sharing_with_providers', '14_sharing_with_providers.html'
UNION SELECT 'SlideController', 'facade', '15_facade.html'
UNION SELECT 'SlideController', 'implementing_facade', '16_implementing_facade.html'
UNION SELECT 'SlideController', 'provider_configuration', '17_provider_configuration.html'
UNION SELECT 'SlideController', 'configuring_httpproviders', '18_configuring_httpproviders.html'
UNION SELECT 'SlideController', 'scope_problem', '19_scope_problem.html'
UNION SELECT 'SlideController', 'notifications', '20_notifications.html'
UNION SELECT 'SlideController', 'how_to_use_notifications', '21_how_to_use_notifications.html'
UNION SELECT 'SlideController', 'workflow_automation', '22_workflow_automation.html'
UNION SELECT 'SlideController', 'tools', '23_tools.html'
UNION SELECT 'SlideController', 'thanks', '24_thanks.html'