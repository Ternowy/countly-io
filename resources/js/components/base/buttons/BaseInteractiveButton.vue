<template>
    <button v-bind="$attrs" @click="$emit('changed')">
        <div class="toggle-wrapper" :class="[value?'bg-'+background:'bg-'+variables.disabled, color]">
            <div class="toggle-inner" :class="[value?'active':'inactive']"></div>
        </div>
        <slot>
            {{ label }}
        </slot>
    </button>
</template>

<script>
import variables from "../../../assets/variables";

export default {
    name: 'BaseInteractiveButton',
    emits: ['change'],
    props: {
        label: {
            type: String,
        },
        color: {
            type: String,
            default: 'white',
            validator: (value) => Object.values(variables).includes(value)
        },
        background: {
            type: String,
            default: 'green',
            validator: (value) => Object.values(variables).includes(value)
        },
        value: {
            required: true,
        }
    },

};
</script>

<style lang="scss" scoped>
button{
    border: none;
    background: none;
    cursor: pointer;
    font-weight: 300;
    font-size: 14px;
    line-height: 16px;
    color: #828282;
    display: flex;
    column-gap: 5px;
    align-items: center;
    .toggle-wrapper {
        position: relative;
        border-radius: 30px;
        width: 44px;
        height: 24px;
        .toggle-inner{
            transition: all 0.2s linear;
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            background: #FFFFFF;
            box-shadow: 0px 2px 5px rgba(85, 85, 85, 0.15);
            border-radius: 30px;
            &.inactive{
              left: unset;
                right: 2px;

            }
        }

    }
}
@media (max-width: 768px) {
    button{
        .toggle-wrapper{
            width: 26px;
            height: 14px;
            .toggle-inner{
                width: 10px;
                height: 10px;
            }
        }
    }
}
</style>
