SELECT products.*, 

product_images.small_image,
product_images.image_path,

categories.id as category_id,
categories.title as category_title,
categories.slug as category_slug

FROM products
INNER JOIN product_images ON product_images.product_id = products.id
LEFT JOIN product_categories ON product_categories.product_id = products.id
LEFT JOIN categories on categories.id = product_categories.category_id
GROUP BY products.id


-- ( SELECT product_images.original_image from product_images WHERE product_images.product_id = products.id  LIMIT 1 ) AS image