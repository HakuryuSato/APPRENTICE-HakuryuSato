-- 1. CASE
SELECT emp_no,
    to_date,
    CASE
        WHEN to_date = '9999-01-01' then 'unemployed'
        else 'employed'
    END AS 'employ_status'
FROM dept_emp
WHERE emp_no BETWEEN 10100 AND 10200;
-- 2. 年代
SELECT emp_no,
    birth_date,
    CASE
        WHEN birth_date BETWEEN '1950-01-01' AND '1959-12-31' THEN '50s'
        WHEN birth_date BETWEEN '1960-01-01' AND '1969-12-31' THEN '60s'
        else 'we dont know'
    END AS 'period'
FROM employees
WHERE emp_no BETWEEN 10001 AND 10050;

-- 3.年代ごとの最大給与
SELECT CASE
        WHEN e.birth_date BETWEEN '1950-01-01' AND '1959-12-31' THEN '50s'
        WHEN e.birth_date BETWEEN '1960-01-01' AND '1969-12-31' THEN '60s'
        ELSE 'we dont know'
    END AS period,
    MAX(s.salary) AS max_salary
FROM employees AS e
    JOIN salaries AS s ON e.emp_no = s.emp_no
WHERE e.emp_no BETWEEN 10001 AND 10050
GROUP BY period;