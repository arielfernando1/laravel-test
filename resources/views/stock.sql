// Update stock after insert order trigger

CREATE TRIGGER update_stock
AFTER INSERT ON logs
FOR EACH ROW
BEGIN
    UPDATE products
    SET stock = stock - NEW.qty
    WHERE id = NEW.product_id;
END;
