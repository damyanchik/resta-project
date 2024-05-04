<template>
    <div class="background__block background__block--grey"></div>

    <main id="menu">
        <div
            data-bs-toggle="collapse"
            data-bs-target="#menu__block"
            aria-expanded="true"
            aria-controls="menu__block"
            class="menu__collapse col-11 p-1 px-2 collapsed" style="
        background-color: #1a202c;
        color: #b8965c;
        text-transform: uppercase;
        letter-spacing: 2px;
        width: 100%;
        border: #b8965c solid;
        "><i class="fa-solid fa-bars"></i> Menu
        </div>

        <div id="menu__block" class="menu__block collapse show" data-bs-parent="#menu" style="
    border: #b8965c solid;
        border-top: none;
    width: 100%;
    max-height: 70vh;
    background-color: #1a202c;
    color: #b8965c;
    overflow: scroll !important;
    overflow-x: hidden !important;
    ">
            <div class="menu__list pt-4 pb-3">

                <div class="category__block" style="
            margin-top: -1rem;
            background-color: transparent;
            position: fixed;
            right: 5vh;
            width: 100%;
           ">
                    <div class="filter mx-auto" style="
                width: 2rem;
                ">
                        <select class="rounded" style="background-color: #2d3748; color: #b8965c; font-size: 16px">
                            <option style="font-size: 10px">Categories</option>
                            <option style="font-size: 10px">Breakfast</option>
                            <option style="font-size: 10px">Dishes</option>
                            <option style="font-size: 10px">Drinks</option>
                        </select>
                    </div>
                </div>

                <div class="product__block mt-1 row p-2">
                    <div class="product__image col-3 mt-2">
                        <img
                            class="img-fluid rounded"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2sa7ESdl-AIhJD46jXYQZ8qDGeodbNGlbnw&usqp=CAU">
                    </div>

                    <div class="col-6">
                        <div class="product__name">Pizza Funghi</div>
                        <div class="product__desc"
                             style="font-size: 12px"
                        >Super Pizza z super skladnikami ho ho ho raz dwa trzy
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="product__price">50 gr</div>
                        <div class="product__quantity">- 0 +</div>
                    </div>
                </div>

            </div>
        </div>


        <div
            data-bs-toggle="collapse"
            data-bs-target="#order_block"
            aria-expanded="false"
            aria-controls="order_block"
            class="order_block col-11 p-1 mt-1 px-2 collapsed" style="
        background-color: #1a202c;
        color: #b8965c;
        text-transform: uppercase;
        letter-spacing: 2px;
        width: 100%;
        border: #b8965c solid;
        "><i class="fa-solid fa-bars"></i> Order

            <div class="float-end badge-pill rounded px-2" style="
background-color: #2d3748;
border: #b8965c 1px solid;
">4
            </div>

        </div>

        <div id="order_block" class="order_block collapse" data-bs-parent="#menu" style="
    border: #b8965c solid;
    border-top: none;
    width: 100%;
    max-height: 70vh;
    background-color: #1a202c;
    color: #b8965c;
    overflow: scroll !important;
    overflow-x: hidden !important;
    ">
            <div class="menu__list pt-2">
                <div class="product__block mt-1 row p-2">
                    <div class="product__image col-3 mt-2">
                        <img
                            class="img-fluid rounded"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2sa7ESdl-AIhJD46jXYQZ8qDGeodbNGlbnw&usqp=CAU">
                    </div>

                    <div class="col-6">
                        <div class="product__name">Pizza Funghi</div>
                        <div class="product__desc"
                             style="font-size: 12px"
                        >Super Pizza z super skladnikami ho ho ho raz dwa trzy
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="product__price">50 gr</div>
                        <div class="product__quantity">- 0 +</div>
                    </div>
                </div>

                <div class="order__summary py-1 row">
                    <div class="col-6">
                        <span class="ps-2">SUM</span>
                    </div>
                    <div class="col-6 text-end">
                        <span class="pe-2">230.05 EUR</span>
                    </div>
                </div>

                <div class="order__buttons row" style="text-align: center; letter-spacing: 1px;">
                    <button @click="redirectTo('/')"
                            class="col-6 p-1 h4" style="background-color: #2d3748; border-top: #b8965c"
                    >Cancel</button>
                    <button @click="redirectTo('/service')"
                            class="col-6 p-1 h4" style="background-color: #2d3748; border-top: #b8965c"
                    >Confirm</button>
                </div>
            </div>
        </div>
    </main>
</template>


<script>
export default {
    methods: {
        redirectTo(route) {
            this.$router.push(route);
        },
    },
};
</script>
