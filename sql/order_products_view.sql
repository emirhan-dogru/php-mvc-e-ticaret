
SELECT 

order_products.id,
order_products.user_id,
order_products.product_id,
order_products.product_price,
order_products.count,
order_products.order_id,

products.title,
products.slug,

product_images.image_path,
product_images.small_image

FROM order_products
INNER JOIN products ON products.id = order_products.product_id
INNER JOIN product_images ON product_images.product_id = products.id

WHERE product_images.image_order = 1 