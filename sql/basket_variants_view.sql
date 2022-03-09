SELECT 
basket_variants.basket_id,
product_variants.variant_name,
product_variants.variant_value

FROM basket_variants
INNER JOIN product_variants ON product_variants.id = basket_variants.variant_id