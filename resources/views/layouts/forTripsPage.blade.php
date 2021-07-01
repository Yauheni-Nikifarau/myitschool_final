<div class="container">
    <div class="album">
        @if (count($tripList) == 0)
            <div class="info warning">
                Empty result
            </div>
        @endif
        @foreach($tripList as $trip)
            @include('layouts.tripCard')
        @endforeach
    </div>

    <div class="pagination">
        @for ($i = $startPage; $i <= $endPage; $i++)
            <a href="/trips?{{ $queryString }}&page={{ $i }}" class="paginate-btn">{{ $i }}</a>
        @endfor
    </div>

    <form action="/trips" method="GET" class="form">
        <div class="form-raw">
            <div class="form-col">

                <h4>Hotel</h4>
                <input type="text" class="form-text_input" name="hotel" placeholder="hotel" value="{{ $queries['hotel'] }}">

                <h4>Tag</h4>
                <select class="form-select" name="tag">
                    <option value="" selected>tag</option>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->tag_name }}" @if($tag->tag_name == $queries['tag']) selected @endif >{{ $tag->tag_name }}</option>
                    @endforeach
                </select>

                <h4>Discount value</h4>
                <select class="form-select" name="discount">
                    <option value="" selected>discount</option>
                    @foreach($discounts as $discount)
                        <option value="{{ $discount->value }}" @if($discount->value == $queries['discount']) selected @endif >{{ $discount->value }}%</option>
                    @endforeach
                </select>

                <h4>Price</h4>
                <div class="form-input_group">
                    <div class="form-input_cell">
                        <input type="number" class="form-inner_input" name="min_price" placeholder="Min price" value="{{ $queries['min_price'] }}">
                    </div>
                    <div class="form-input_cell">
                        <input type="number" class="form-inner_input" name="max_price" placeholder="Max Price" value="{{ $queries['max_price'] }}">
                    </div>
                </div>

            </div>


            <div class="form-col">

                <h4 class="mt-3">People</h4>
                <div class="form-input_group">
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio1" value="1" @if(1 == $queries['people']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio2" value="2" @if(2 == $queries['people']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio3" value="3" @if(3 == $queries['people']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio3">3</label>
                    </div>
                </div>

                <h4 class="mt-3">Meal</h4>
                <div class="form-input_group">
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="meal" id="inlineRadio1" value="OB" @if("OB" == $queries['meal']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio1">OB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="meal" id="inlineRadio2" value="HB" @if("HB" == $queries['meal']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio2">HB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="meal" id="inlineRadio3" value="FB" @if("FB" == $queries['meal']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio3">FB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="meal" id="inlineRadio2" value="BB" @if("BB" == $queries['meal']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio2">BB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="meal" id="inlineRadio3" value="AI" @if("AI" == $queries['meal']) checked @endif >
                        <label class="form-radio-label" for="inlineRadio3">AI</label>
                    </div>
                </div>



                <h4>Date in</h4>
                <div class="form-input_group">
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="min_date_in" name="min_date_in" aria-label="Min date in" value="{{ $queries['min_date_in'] }}">
                    </div>
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="max_date_in" name="max_date_in" aria-label="Max date in" value="{{ $queries['max_date_in'] }}">
                    </div>
                </div>

                <h4>Date out</h4>
                <div class="form-input_group">
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="min_date_out" name="min_date_out" aria-label="Min date out" value="{{ $queries['min_date_out'] }}">
                    </div>
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="max_date_out" name="max_date_out" aria-label="Max date out" value="{{ $queries['max_date_out'] }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-button-group" role="group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset" id="reset-btn">Reset</button>
            <script src="/js/form.js"></script>
        </div>

    </form>
</div>

