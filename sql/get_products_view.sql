CREATE VIEW get_products_view AS

SELECT products.*, 

product_images.small_image,
product_images.image_path

FROM products
INNER JOIN product_images ON product_images.product_id = products.id
GROUP BY products.id


-- ( SELECT product_images.original_image from product_images WHERE product_images.product_id = products.id  LIMIT 1 ) AS image