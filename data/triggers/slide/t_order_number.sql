CREATE TRIGGER "t_order_number"
	AFTER INSERT
	ON "slide"
	FOR EACH ROW
BEGIN
    UPDATE  slide
    SET     order_number = (
							SELECT round((ifnull((
											SELECT max(order_number)
											FROM slide
										  ), 0) + 10)/10) * 10 AS o_n
						    FROM slide
						   )
    WHERE   ROWID = new.ROWID;
END