-- 平均より給与が高い
SELECT emp_no,
    salary
FROM salaries
WHERE emp_no BETWEEN 10001 AND 10010
    AND salary > (
        SELECT AVG(salary)
        FROM salaries
    );
-- 平均の2倍以上
SELECT DISTINCT(emp_no)
FROM salaries
WHERE salary >= 2 * (
        SELECT AVG(salary)
        FROM salaries
    );
-- 最大給与
SELECT emp_no,
    MAX(salary)
FROM salaries
WHERE emp_no BETWEEN 10001 AND 10010
    AND salary > (
        SELECT AVG(salary)
        FROM salaries
    )
GROUP BY emp_no;
-- 相関サブクエリ 
-- 相関サブクエリ使うと処理が終わらない？
SELECT gender,
    emp_no,
    birth_date
FROM employees e1
WHERE birth_date = (
        SELECT MIN(birth_date)
        FROM employees e2
        WHERE e1.gender = e2.gender
    );
-- 相関サブクエリを使わない
SELECT gender,
    emp_no,
    birth_date
FROM employees
WHERE (gender, birth_date) IN (
        -- genderごとに誕生日の最小値を返す
        SELECT gender,
            MIN(birth_date)
        FROM employees
        GROUP BY gender
    );
-- 一番若い従業員
SELECT gender,
    birth_date,
    emp_no,
    first_name,
    last_name
FROM employees e1
WHERE emp_no BETWEEN 10100 AND 10200
    AND birth_date = (
        SELECT MAX(birth_date)
        FROM employees e2
        WHERE e1.gender = e2.gender
            AND e2.emp_no BETWEEN 10100 AND 10200
    );