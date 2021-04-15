<template>
    <div>
        <a v-if="link" :href="link" v-bind="$attrs" :class="[rounded? 'rounded':'', icon?'icon':'', 'bg-'+background, shadow?'shadow-'+shadow:'' ]" >
            <slot name="pre-icon"></slot>
            <slot name="text">
                <span>
                    {{ label }}
                </span>
            </slot>
            <slot name="post-icon"></slot>
        </a>
        <button @click="$emit('clicked')" v-else v-bind="$attrs" :class="[rounded? 'rounded':'', icon?'icon':'', 'bg-'+background, shadow?'shadow-'+shadow:'' ]" >
            <slot name="pre-icon"></slot>
            <slot name="text">
            <span>
                {{ label }}
            </span>
            </slot>
            <slot name="post-icon"></slot>
        </button>

    </div>
</template>

<script>
import variables from "../../../assets/variables";

export default {
    name: 'BaseButton',
    emits: ['clicked'],
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
        rounded: {
            type: Boolean
        },
        icon: {
            type: Boolean,
        },
        shadow: {
            type: String,
        },
        link: {
            type: String,
        }

    }
};
</script>

<style lang="scss" scoped>
a,
button{
    cursor: pointer;
    height:56px;
    padding: 17px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
    span{
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 21px;
        color: #FFFFFF;
    }
    &.rounded{
        border-radius: 50px;
    }
    &.icon{
        width:56px;
        padding: 0;
        &.rounded{
            border-radius: 50%;
        }
    }
}
@media (max-width: 768px){
 a,button{
     padding: 14px 22px;
     height: 45px;
     font-weight: 500;
     font-size: 14px;
     line-height: 16px;

     &.icon{
         height: 30px;
         width: 30px;
         svg{
             width: 11px;
         }
     }
 }
}

</style>
