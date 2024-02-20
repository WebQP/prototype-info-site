
<footer>
    <div id="footer" class="container">
        <div class="row">
            <div class="footer-blocks">

                <div class="col-sm-3 column footerleft">

                </div>

                <div class="col-sm-3 column">
                    <h5>Информация</h5>
                    <ul class="list-unstyled">
                        <li class="top_level"><a href="/about-the-company">Despre companie</a></li>
                        <li class="top_level"><a href="/livrarea-i-achitarea">Livrarea şi achitarea</a></li>
                        <li class="top_level"><a href="/terms-and-conditions">Termeni și condiții</a></li>
                        <li class="top_level"><a href="/vacancies">Posturi vacante</a></li>
                        <li class="top_level"><a href="/sitemap">Harta Site-ului</a></li>
                    </ul>
                </div>

                <div id="extra-link" class="col-sm-3 column">
                    <h5>Дополнительные услуги</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Ссылка</a></li>
                    </ul>
                </div>


                <div class="col-sm-3 column">
                    <h5>Аккаунт</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Ссылка</a></li>
                    </ul>
                </div>

                <div class="footertop">
                    <script>
                        function subscribe()
                        {
                            var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            var email = $('#txtemail').val();
                            if(email != "")
                            {
                                if(!emailpattern.test(email))
                                {
                                    $('.text-danger').remove();
                                    var str = '<span class="error">Invalid Email</span>';
                                    $('#txtemail').after('<div class="text-danger">Invalid Email</div>');

                                    return false;
                                }
                                else
                                {
                                    $.ajax({
                                        url: 'index.php?route=extension/module/newsletters/news',
                                        type: 'post',
                                        data: 'email=' + $('#txtemail').val(),
                                        dataType: 'json',


                                        success: function(json) {

                                            $('.text-danger').remove();
                                            $('#txtemail').after('<div class="text-danger">' + json.message + '</div>');

                                        }

                                    });
                                    return false;
                                }
                            }
                            else
                            {
                                $('.text-danger').remove();
                                $('#txtemail').after('<div class="text-danger">Email Is Require</div>');
                                $(email).focus();

                                return false;
                            }
                        }
                    </script>
                    <div class="newsletter">
                        <h5 class="news-title">Новостная рассылка</h5>
                        <div class="sub-title">Вы можете в любой момент отказаться от подписки на нашу рассылку новостей</div>
                        <div class="newsright">
                            <form action="" method="post">
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="input-firstname">Email</label>
                                    <div class="input-news">
                                        <input type="email" name="txtemail" id="txtemail" value="" placeholder="Enter Your Email Address" class="form-control input-lg"  />
                                    </div>
                                    <div class="subscribe-btn">
                                        <button type="submit" class="btn btn-default btn-lg" onclick="return subscribe();">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="paiement_logo_block footer-block">
                        <img src="{{asset('new/images/pay/visa.png')}}" alt="visa" width="32" height="20">
                        <img src="{{asset('new/images/pay/discover.png')}}" alt="discover" width="32" height="20">
                        <img src="{{asset('new/images/pay/american_express.png')}}" alt="american_express" width="32" height="20">
                        <img src="{{asset('new/images/pay/google_wallet.png')}}" alt="google_wallet" width="32" height="20">
                        <img src="{{asset('new/images/pay/paypal.png')}}" alt="paypal" width="32" height="20">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bottom-footer" class="bottomfooter">
        <div class="container">
            <p id="powered" class="powered">Powered By <a href="http://www.opencart.com">Копирайт</a> &copy; 2023</p>
        </div>
    </div>
</footer>
