SELECT 

baskets.id,
baskets.count,
baskets.basket_status,
baskets.user_id,
baskets.product_id,

products.title,
products.price,
products.sale_price,

product_images.image_path,
product_images.small_image

FROM `baskets` 
INNER JOIN products on products.id = baskets.product_id
INNER JOIN product_images on product_images.product_id = products.id

WHERE product_images.image_order = 1