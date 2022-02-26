SELECT 

categories.id,
categories.title,
categories.slug,
product_categories.product_id,
categories.status

FROM product_categories
INNER JOIN categories on categories.id = product_categories.category_id