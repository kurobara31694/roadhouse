-- Just the view code

-- No backticks
select 
l.user_id AS user_id, 
f.order_date AS order_date, 
l.address AS address, 
l.state AS state, 
l.zip AS zip, 
f.c_month AS c_month, 
f.c_day AS c_day, 
f.c_year AS c_year, 
f.num_gallons AS num_gallons, 
f.trans_cost AS trans_cost,
f.discount AS discount,
f.seasonalrate AS seasonalrate,
f.price_per_gallon AS price_per_gallon, 
f.total_price AS total_price 
from 
(fuelcalc f left join log l 
on((f.cust_user_id = l.user_id)));