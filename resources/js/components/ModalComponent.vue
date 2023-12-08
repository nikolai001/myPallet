<template>
    <div class="modal">
        <form class="modal__form" @submit.prevent>
            <input class="form__input" placeholder="Name" v-model="unit.name" />
            <select class="form__select" v-model="unit.type">
                <option class="select__option" value="truck">truck</option>
                <option class="select__option" value="trailer">trailer</option>
            </select>
            <div class="form__cta-buttons">
                <button class="cta-buttons__button cta-buttons__button--cancel" type="button" @click="cancel()">Cancel</button>
                <button class="cta-buttons__button cta-buttons__button--accept" :class="{'cta-buttons__button--pending' : pending }" type="button" @click="create()">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data () {
        return {
            pending: false,
            unit : {
                name : '',
                type: '',
            }
        }
    },

    methods : {
        cancel () {
            this.pending = false
            this.$emit('close')
            this.unit.name = ''
            this.unit.type = ''
        },
        async create () {
            if (this.unit.name.length > 1 & (this.unit.type == 'truck' || this.unit.type == 'trailer') & !this.pending) {
                this.pending = true
                await fetch('http://localhost:8000/api/units', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(this.unit)
                })
                .then(response => response.json())
                .then(data => this.$emit('append',data))
                .then(this.cancel())
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
                    &--pending {
                        color: white;
                        background-color: $white--dark;
                        border-radius: 6px;
                        cursor: not-allowed;
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