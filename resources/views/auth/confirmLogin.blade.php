
<div style="display:none">
    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

                <input id="email" type="email"  name="email" value="{{ $email }}">
                <input id="password" type="password" name="password" value="{{ $password }}">
                <input type="hidden" name="confirm" id="confirm">
    </form>

</div>
<script>
    function confirmedLogin(){
        var confirmval = confirm("Your previous session is running! Do you want to destroy it and login here?")
        document.getElementById("confirm").value = confirmval;
        document.getElementById("loginForm").submit();
    }
    confirmedLogin()
</script>

