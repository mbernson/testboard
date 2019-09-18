select count(*) as cnt, `app_id`, `result` from test_cases 
where `created_at` > TIMESTAMP(DATE_SUB(NOW(), INTERVAL 1 MONTH))
group by `app_id`, `result`;
