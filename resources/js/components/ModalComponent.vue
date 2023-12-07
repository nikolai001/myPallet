<template>
    <div class="modal">
        <form class="modal__form" @submit.prevent>
            <input class="form__input" placeholder="Name" v-model="unit.name" />
            <select class="form__select" v-model="unit.type">
                <option class="select__option" value="truck">Truck</option>
                <option class="select__option" value="trailer">Trailer</option>
            </select>
            <div class="form__cta-buttons">
                <button class="cta-buttons__button cta-buttons__button--cancel" type="button" @click="cancel()">Cancel</button>
                <button class="cta-buttons__button cta-buttons__button--accept" type="button" @click="create()">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data () {
        return {
            unit : {
                name : '',
                type: '',
            }
        }
    },

    methods : {
        cancel () {
            this.$emit('close')
            this.unit.name = ''
            this.unit.type = ''
        },
        create () {
            if (this.unit.name.length > 1 & (this.unit.type == 'truck' || this.unit.type == 'trailer')) {
                console.log('Valid entry')
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import "resources/sass/_colors.scss";
@import "resources/sass/_transitions.scss";
@import "resources/sass/_boxshadows.scss";
    .modal {
        width: 100%;
        background-color: rgba(black,.1);
        position: absolute;
        left: 0;
        top: 0;
        height: 100vh;
        z-index: 5;
        &__form {
            background-color: $white;
            width: 40%;
            max-width: 600px;
            margin: 25% auto;
            display:flex;
            flex-direction: row;
            flex-wrap: wrap;
            border-radius: 16px;
            padding: 16px 8px;
            justify-content: space-around;
            .form__select {
                width: 35%;
                border: none;
                border-radius: 6px;
                padding: 6px 4px;
                box-shadow: $el-1;
                background-color: $white;
                font-family: 'Roboto';
                font-weight: 300;
            }
            .form__cta-buttons {
                width: 100%;
                display: flex;
                margin-top: 20px;
                justify-content: space-around;
                .cta-buttons__button {
                    width: 45%;
                    padding: 4px 2px;
                    background-color: transparent;
                    border: none;
                    cursor: pointer;
                    font-family: 'Roboto';
                    font-weight: 300;
                    &--cancel {
                        color: $white--dark;
                    }
                    &--accept {
                        color: white;
                        background-color: $green;
                        border-radius: 6px;
                        box-shadow: $el-1;
                    }
                }
            }
            .form__input {
                width: 50%;
                border: none;
                max-width: 150px;
                display: flex;
                flex-direction: column;
                place-content: center;
                padding: 6px 4px;
                border-radius: 6px;
                box-shadow: $el-1;
                font-family: 'Roboto';
                font-weight: 300;
            }
        }
    }
</style>