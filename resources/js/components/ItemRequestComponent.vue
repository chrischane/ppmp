<template>
    <div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right" for="item_ppmp">PPMP</label>
            <div class="col-md-6">
                <select class="form-control" id="item_ppmp" name="item_ppmp">
                    <option v-for="ppmp in ppmps" v-bind:value="ppmp.ppmp_id">{{ppmp.ppmp_id}}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="quarter" class="col-md-4 col-form-label text-md-right">Quarter</label>

            <div class="col-md-6">
                <input id="quarter" type="text" class="form-control" name="quarter">
                <small class="form-text text-muted">E.g. FIRST QUARTER, SECOND QUARTER, THIRD QUARTER</small>
            </div>

        </div>

        <div class="form-group row">
            <label for="item_description" class="col-md-4 col-form-label text-md-right">Item Description</label>

            <div class="col-md-6">

                <input id="item_description" v-model="selected_item.description" class="form-control" type="text" name="item_description" list="itemList" v-on:change="checkDescriptionMatch()">
                <datalist id="itemList">
                    <option v-for="item in items" v-bind:value="item.description"></option>
                </datalist>

            </div>
        </div>

        <div class="form-group row">
            <label for="item-specification" class="col-md-4 col-form-label text-md-right">Specification</label>

            <div class="col-md-6">
                <textarea v-model="selected_item.specification" class="form-control" id="item-specification" name="item_specification">

                </textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="unit" class="col-md-4 col-form-label text-md-right">Unit</label>

            <div class="col-md-6">
                <input v-model="selected_item.unit" id="unit" type="text" class="form-control" name="unit">
            </div>
        </div>

        <div class="form-group row">
            <label for="unit-price" class="col-md-4 col-form-label text-md-right">Unit Price</label>

            <div class="col-md-6">
                <input v-model="selected_item.unit_price" id="unit-price" type="number" class="form-control" name="unit_price">
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>

            <div class="col-md-6">
                <input v-model="selected_item.quantity" id="quantity" type="number" class="form-control" name="quantity" v-on:change="calculate">
            </div>
        </div>

        <div class="form-group row">
            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>

            <div class="col-md-6">
                <input v-model="selected_item.amount" id="amount" type="number" class="form-control" name="amount" v-on:change="calculate" :readonly="readOnly">
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['items', 'ppmps'],
        data() {
            return {
                selected_item: {
                    description: '',
                    unit_price: null,
                    unit: '',
                    specification: '',
                    quantity: 0,
                    amount: 0,
                },
                readOnly : false,
            }
        },
        mounted() {
            console.log(this.items);
        },
        methods: {
            checkDescriptionMatch() {
                let matched_element = null;
                this.items.forEach(element=>{
                    console.log(element.description == this.selected_item.description);
                    if( element.description == this.selected_item.description ) {
                        matched_element = element;
                    }else {
                        // pass
                    }
                });

                if( matched_element ) {
                    this.selected_item.description = matched_element.description;
                    this.selected_item.unit_price = matched_element.price;
                    this.selected_item.unit = matched_element.unit;
                    this.selected_item.specification = matched_element.specification;
                    this.readOnly = true;
                }else {
                    this.readOnly = false;
                }
            },
            calculate() {
                this.selected_item.amount = this.selected_item.unit_price * this.selected_item.quantity;
            }
        }
    }
</script>
