SELECT * 
FROM colours, images, products, sizes 
WHERE products.product_name = colours.product_name AND 
products.product_name = images.product_name AND 
products.product_name = sizes.product_name AND 
images.product_name = colours.product_name AND 
images.colour_name = colours.colour_name


-- Single Product and Single Colour / Product Detail Query
SELECT * FROM colours, images, products, sizes 
WHERE products.product_name = colours.product_name 
AND products.product_name = images.product_name 
AND products.product_name = sizes.product_name 
AND images.product_name = colours.product_name 
AND images.colour_name = colours.colour_name 
AND products.product_name = 'ABBY TOP' 
AND colours.colour_name = 'Green'


