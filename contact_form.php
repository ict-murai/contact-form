<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- JS only -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $("input[type='radio']").click(function(){
                var radioValue = $("input[name='type']:checked").val();
                if(radioValue){
                $("#message-label").text(radioValue + "内容");
                }
            });

            // フォーム送信時のバリデーション
            $("form").submit(function(e){
                var isValid = true;

                // 名前のチェック
                if($("input[name='name']").val() === ""){
                    alert("名前を入力してください");
                    isValid = false;
                }

                // メールアドレスのチェック
                var email = $("input[name='email']").val();
                if(email === ""){
                    alert("メールアドレスを入力してください");
                    isValid = false;
                } else if(!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)){
                    alert("メールアドレスの形式が正しくありません");
                    isValid = false;
                }

                // 年齢のチェック
                if($("select[name='age']").val() === ""){
                    alert("年齢を選択してください");
                    isValid = false;
                }

                // 質問・相談・依頼のチェック
                if(!$("input[name='type']").is(':checked')){
                    alert("質問・相談・依頼のいずれかを選択してください");
                    isValid = false;
                }

                if(!isValid){
                    e.preventDefault(); // フォームの送信を防ぐ
                }
            });
        });
    </script>
</head>
<body>
    <div class="container py-5" style="width:60%;">
        <h1 class="mb-5">お問い合わせフォーム</h1>
        <form action="confirm.php" method="post">
        <div class="mb-3">
            <label class="form-label">氏名 [必須]</label>
            <input type="text" name="name" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">メールアドレス [必須]</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label class="form-label">性別 [必須]</label><br>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="男性" required>
            <label class="form-check-label" for="male">男性</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" value="女性" required>
            <label class="form-check-label" for="female">女性</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">趣味（複数選択可）</label><br>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby1" value="読書">
            <label class="form-check-label" for="hobby1">読書</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby2" value="旅行">
            <label class="form-check-label" for="hobby2">旅行</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="hobby[]" id="hobby3" value="スポーツ">
            <label class="form-check-label" for="hobby3">スポーツ</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">年齢 [必須]</label>
            <select class="form-select" name="age" required>
            <option selected disabled value="">選択してください</option>
            <option value="<20">20歳未満</option>
            <option value="20~29">20 ~ 29歳</option>
            <option value="30~39">30 ~ 39歳</option>
            <option value="40~49">40 ~ 49歳</option>
            <option value="50>">50歳以上</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">質問・相談・依頼 [必須]</label><br>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="type" id="question" value="質問" required>
            <label class="form-check-label" for="question">質問</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="type" id="consultation" value="相談" required>
            <label class="form-check-label" for="consultation">相談</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="type" id="request" value="依頼" required autofocus>
            <label class="form-check-label" for="request">依頼</label>
            </div>
        </div>
        <div class="mb-3">
            <label id="message-label" class="form-label">内容</label>
            <textarea name="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

