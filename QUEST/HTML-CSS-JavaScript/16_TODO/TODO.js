// 1.ユーザーがテキストボックスにタスクを入力し、追加ボタンを押すと、タスクが追加され表示される。テキストボックスは空になる
// テキストボックス要素を取得

// documentを省略するための定数
const doc = document;
const todoList = doc.getElementById("todo-list");

// タスク追加ボタン用イベントリスナー
doc.addEventListener("submit", function (event) {
    event.preventDefault();
    // const todoList = doc.getElementById("todo-list");
    const taskText = document.getElementById("todo-input").value;


    const li = document.createElement("li");
    li.className = "todo-item";

    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";

    const span = document.createElement("span");
    span.textContent = taskText;

    const button = document.createElement("button");
    button.className = "delete-button";
    button.textContent = "削除";

    // 要素を追加
    li.appendChild(checkbox);
    li.appendChild(span);
    li.appendChild(button);
    todoList.appendChild(li)

    // 入力欄をクリア
    document.getElementById("todo-input").value = ''

});

// todoList用イベントリスナー
todoList.addEventListener("click", function(event) {
    // 2. 各タスクには削除ボタンが付いており、削除ボタンを押すとタスクが削除される
    if (event.target.classList.contains("delete-button")) {
        const li = event.target.closest("li");
        todoList.removeChild(li);

        // 3. 各タスクにはチェックボックスが付いており、チェックボックスにチェックを入れるとタスクが完了したことになり、タスクの文字に取り消し線が付く。チェックを外すと取り消し線が消える
    } else if (event.target.type === "checkbox") {
        const span = event.target.nextElementSibling;
        if (event.target.checked) {
            span.style.textDecoration = "line-through";
        } else {
            span.style.textDecoration = "none";
        }
    }
});


