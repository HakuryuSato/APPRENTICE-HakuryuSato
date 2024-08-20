const doc = document
const buttons = doc.getElementById('buttons')


// ユーザーが数字ボタンを押すと、その数字が表示エリアに表示されます
// すでに数字が表示されている場合は、数字ボタンを押すと、その右側に新しい数字が追加されます
// 番号を入力した後に四則演算ボタンを押すと、番号の右側に四則演算の記号が表示されます
// 四則演算ボタンを押した後、新しい数値を入力すると、表示エリアに新しい数値が表示されます
// イコールボタンを押すと、保存されている数値と現在表示されている数値の演算結果を計算し、結果を表示します
// クリアボタンを押すと、表示領域と保存されている操作や数値がクリアされます

buttons.addEventListener('click',function(event){
    event.preventDefault;

    const display = document.getElementById('display');
    const buttonContent = event.target.textContent;
    const buttonClass = event.target.className;
    
    if (buttonClass === 'digit') { // 数字
        display.textContent += buttonContent;
    } else if (buttonClass === 'operator') { // 演算子
        display.textContent += ` ${buttonContent} `;
    } else if (event.target.id === 'clear') { //クリアボタン
        display.textContent = '';
    } else if (event.target.id === 'equals') { // イコール
        display.textContent = eval(display.textContent);
    }

})
