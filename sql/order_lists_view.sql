SELECT 

orders.id,
orders.user_id,
CONCAT(orders.country, " / ", orders.city) AS addres,
orders.phone,
orders.order_status,

orders.created_at,
orders.updated_at,

users.name_surname,
users.email,

( 
    SELECT  SUM(order_products.product_price * order_products.count )
 	FROM order_products 
    WHERE order_products.order_id = orders.id  
)  AS order_price


from orders
INNER JOIN users ON users.id = orders.user_id
