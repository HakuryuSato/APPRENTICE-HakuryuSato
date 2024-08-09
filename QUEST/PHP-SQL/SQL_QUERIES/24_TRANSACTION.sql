-- ロールバック

START TRANSACTION;

select * from employees where first_name = 'SATO';

INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) 
VALUES (1, '1990-01-01', 'SATO', 'Suzuki', 'M', '2023-01-01');

select * from employees where first_name = 'SATO';

ROLLBACK;

select * from employees where first_name = 'SATO';

-- コミット

START TRANSACTION;

select * from employees where first_name = 'SATO';

INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) 
VALUES (1, '1990-01-01', 'SATO', 'Suzuki', 'M', '2023-01-01');

select * from employees where first_name = 'SATO';

COMMIT;

select * from employees where first_name = 'SATO';

