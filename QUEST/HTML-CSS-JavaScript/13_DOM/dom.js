// 要素ノードの変更
document.querySelector("h1").textContent = "シンプルブログ";

// スタイルの変更
const formDiv = document.getElementById("post-form");

formDiv.addEventListener("mouseenter", function () {
  formDiv.style.backgroundColor = "yellow";
});
formDiv.addEventListener("mouseleave", function () {
  formDiv.style.backgroundColor = "white";
});

// Submitボタン押下時
document.getElementById("post-form").addEventListener(
  "submit",
  function (event) {
    // コンソール出力
    event.preventDefault();
    const title = document.getElementById("title").value;
    const content = document.getElementById("content").value;
    console.log(`タイトル: ${title}`);
    console.log(`本文: ${content}`);

    // postで要素追加
    const postDiv = document.createElement("div");
    const postTitle = document.createElement("h2");
    const postContent = document.createElement("p");

    postTitle.textContent = title;
    postContent.textContent = content;

    postDiv.setAttribute("id", "post");
    postDiv.appendChild(postTitle);
    postDiv.appendChild(postContent);
    document.getElementById("posts").appendChild(postDiv);

    // 登録時フォームを空に
    // document.getElementById('title').value = '';
    // document.getElementById('content').value = '';

    // postsが4以上で削除
    const posts = document.getElementById("posts");
    if (posts.childElementCount > 3) {
      posts.removeChild(posts.children[0]);
    }
  },
);
