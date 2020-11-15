<!--footer area-->
<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="coppy-right-box">
            <div class="container">
                <div class="coppy-right-item item-left">
                    <p class="coppy-right-text">Copyright © 2020 Chari.ma</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).on('click','.addcart',function(e){
        e.preventDefault();
        var element = $(this);
        var ida = element.data("prid");
        var val=$('#nbrprcart').html();
        var nval = parseInt(val)+1;

        $.ajax({
            type: "GET",
            url: 'http://localhost:8000/produit/cart/add',
            data: {'ida':ida},
            success: function(data){
              $('#nbrprcart').html(nval);
            }
        });
        return false;
    });
</script>

</body>
</html>