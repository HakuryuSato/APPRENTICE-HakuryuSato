function checkDivisibleByFive(num) {
    if (num % 5 === 0) {
        return true;
    } else {
        throw new Error("数値は5で割り切れません");
    }
}

// 処理を記述、try...catch 構文を使用し、その中で checkDivisibleByFive 関数を呼び出す
try {
    console.log(checkDivisibleByFive(10));
    console.log(checkDivisibleByFive(7));
} catch (e) {
    console.error(e.message);
}
