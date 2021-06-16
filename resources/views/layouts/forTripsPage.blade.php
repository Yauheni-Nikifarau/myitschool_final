<div class="container">
    <div class="album">
        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>

        <div class="card">
            <img src="/img/hotel.jpg" alt="hotel" class="card-img">
            <a href="trip" class="card-title">Trip title here</a>
            <p class="card-text">This is a wider card with supporting text below as a natural
                lead-in to additional content. This content is a little bit longer.</p>
            <div class="card-footer">
                <p class="card-footer_price">1250$</p>
                <p class="card-footer_date">12.03.2021 - 12.03.2021</p>
                <a class="header-sign" href="#">Buy it</a>
            </div>
        </div>
    </div>

    <div class="pagination">
        <a href="#" class="paginate-btn">1</a>
        <a href="#" class="paginate-btn">2</a>
        <a href="#" class="paginate-btn">3</a>
        <a href="#" class="paginate-btn">4</a>
        <a href="#" class="paginate-btn">5</a>
    </div>

    <form action="/trips" method="GET" class="form">
        @csrf
        <div class="form-raw">
            <div class="form-col">

                <h4>Hotel</h4>
                <input type="text" class="form-text_input" placeholder="hotel">

                <h4>Tag</h4>
                <select class="form-select">
                    <option selected>tag</option>
                    <option value="1">bbq</option>
                    <option value="2">children</option>
                    <option value="3">hot tour</option>
                </select>

                <h4>Discount value</h4>
                <select class="form-select">
                    <option selected>discount</option>
                    <option value="1">5%</option>
                    <option value="2">25%</option>
                    <option value="3">35%</option>
                </select>

                <h4>Price</h4>
                <div class="form-input_group">
                    <div class="form-input_cell">
                        <input type="number" class="form-inner_input" placeholder="Min price">
                    </div>
                    <div class="form-input_cell">
                        <input type="number" class="form-inner_input" placeholder="Max Price">
                    </div>
                </div>

            </div>


            <div class="form-col">

                <h4 class="mt-3">People</h4>
                <div class="form-input_group">
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio1" value="1">
                        <label class="form-radio-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio2" value="2">
                        <label class="form-radio-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio3" value="3">
                        <label class="form-radio-label" for="inlineRadio3">3</label>
                    </div>
                </div>

                <h4 class="mt-3">Meal</h4>
                <div class="form-input_group">
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio1" value="OB">
                        <label class="form-radio-label" for="inlineRadio1">OB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio2" value="HB">
                        <label class="form-radio-label" for="inlineRadio2">HB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio3" value="FB">
                        <label class="form-radio-label" for="inlineRadio3">FB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio2" value="BB">
                        <label class="form-radio-label" for="inlineRadio2">BB</label>
                    </div>
                    <div class="form-radio_cell">
                        <input class="form-radio-input" type="radio" name="people" id="inlineRadio3" value="AI">
                        <label class="form-radio-label" for="inlineRadio3">AI</label>
                    </div>
                </div>



                <h4>Date in</h4>
                <div class="form-input_group">
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="Min date in" aria-label="Min date in">
                    </div>
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="Max date in" aria-label="Max date in">
                    </div>
                </div>

                <h4>Date out</h4>
                <div class="form-input_group">
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="Min date out" aria-label="Min date out">
                    </div>
                    <div class="form-input_cell">
                        <input type="date" class="form-inner_input" placeholder="Max date out" aria-label="Max date out">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-button-group" role="group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>

    </form>
</div>

