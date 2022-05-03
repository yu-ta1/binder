function check() {

  // textareaの情報を取得
  let textValue = document.form.comment.value;

  // 「＼n」で区切り、配列として文字を取り出し,取り出した文字ごとの後ろに<br>タグを付け加える。
  textValue = textValue.split("\n").join("<br>");

  // divタグの要素にtextareaの情報を付与
  const test = document.querySelector('.test');
  test.innerHTML = textValue;
};