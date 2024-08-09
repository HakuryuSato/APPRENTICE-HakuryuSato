1.インデックス設定前 EXPLAIN ANALYZE EXPLAIN ANALYZE
explain analyze select *
from employees
where birth_date = '1961-08-03';

| -> Filter: (employees.birth_date = DATE'1961-08-03')  (cost=30166 rows=29934) (actual time=7.51..105 rows=67 loops=1)
    -> Table scan on employees  (cost=30166 rows=299335) (actual time=0.0589..90.6 rows=300024 loops=1)

2.インデックス作成
CREATE index idx_employees_birth_date ON employees(birth_date);

3.インデックス確認 show index
from employees;

4.インデックス後
-> Index lookup on employees using idx_employees_birth_date (birth_date=DATE'1961-08-03')  (cost=23.4 rows=67) (actual time=0.126..0.133 rows=67 loops=1)