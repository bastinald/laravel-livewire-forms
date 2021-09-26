<div>
    <button wire:click="showSlider" type='button' class='px-3 py-2 btn btn-success shadow-none uppercase tracking-wider hover:bg-blue-200 focus:outline-none'>
        <i class="{{ $btnIcon }}"></i>
        <span>{{ __($btnText) }}</span>
    </button>


    @if( $sliderActive )
        <div class="lw-slider-form-holder"  >
            <div class="lw-slider-form slider-active" >
                <button wire:click="hideSlider" type='button' class='btn-close px-3 py-2 btn btn-danger btn-xs'>
                    <i class="fa fa-close"></i>
                </button>

                @section('title', __($title))
                <form  class="{{ $gridClass }}" >
                    @foreach($this->fields() as $field)
                        {{ $field->render()->with($field->data()) }}
                    @endforeach

                    <div class="col-md-12">
                        <div class="d-flex justify-content-end gap-2">
                            @foreach($this->buttons() as $button)
                                {{ $button->render()->with($button->data()) }}
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <style>
        .lw-slider-form-holder {
            width: 100%;
            height: 100vh;
            z-index: 1000000;
            background-color: #80808069;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .lw-slider-form-holder .lw-slider-form {
            background-color: white;
            position: absolute;
            right: 0;
            width: 40%;
            max-width: 720px;
            padding: 40px;
            height: 100%;
            padding-top: 100px;
            box-shadow: 4px 4px 10px black;
        }
        .lw-slider-form-holder .lw-slider-form button.btn-close {
            padding: 2px 10px !important;
            float: right;
            margin-top: -30px;
        }

        @media (max-width: 576px) {
            .lw-slider-form-holder .lw-slider-form {
                width: 100%;
            }
        }
        @media (max-width: 768px) {
            .lw-slider-form-holder .lw-slider-form {
                width: 100%;
            }
        }
        @media (max-width: 992px) {
            .lw-slider-form-holder .lw-slider-form {
                width: 100%;
            }
        }
    </style>
</div>

