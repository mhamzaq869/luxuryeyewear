<style>


    h2 {

        font-weight: bold;
        margin-bottom: 15px;
        color: #000;
    }

    .modal-content {
        border: none;
        background: transparent;
        padding: 0 19px;
    }

    .close {
        position: relative;
        top: 48px;
        left: 13px;
        z-index: 1;
        font-size: 30px;
        font-weight: bold;
        line-height: 1;
        color: black;
    }

    .modal-header {
        border: none;
    }

    .modal-header .close {
        padding: 0rem 1rem !important;
        margin: -1rem -1rem -1rem auto;
    }

    .modal-body {
        border: none;
        background-color: white;
        padding-bottom: 5px
    }

    .close.focus,
    .close:focus {
        outline: 0;
        box-shadow: none !important;
    }

    .form-control-newsletter {
        width: 60%;
    }

    .form-control-newsletter.focus {

        border: none;
        border-color: #fff;
        border-bottom: 1px solid #000;
        outline: 0;
        box-shadow: 0 0 0 0 rgba(0, 123, 255, .25);
    }

    @media (min-width:599px) {
        .modal-dialog {
            max-width: 47rem;
        }

        .details {
            padding: 60px 0 40px 50px;
        }

        .text-muted a {
            color: #c0bfbf;
            font-weight: bold;
            text-decoration: underline;
        }

        small.para {
            font-weight: bold;
            font-size: 14px;
            color: #63686c;
        }
    }
</style>

<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> </button> </div>
            <div class="modal-body p-0 row">
                <div class="col-12 col-lg-5 ad p-0"> <img src="https://i.imgur.com/UCqKKB4.jpg" width="100%"
                        height="100%" /> </div>
                <div class="details col-12 col-lg-7">
                    <h2>STAY TUNED</h2>
                    <p><small class="para">Subscribe to our newsletter and never miss our<br> luxurious eyewear</small></p>
                    <div class="form-group mt-3 pt-3 mb-5">
                        <form action="{{ route('subscribe') }}" method="post" class="newsletter-inner d-flex">
                            @csrf
                            <input type="email"  name="email" class="form-control form-control-newsletter" placeholder="email@example.com">
                            <button class="btn btn-dark" type="submit">SUBSCRIBE US</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
