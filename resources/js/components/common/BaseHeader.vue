<template>
    <div class="header">
        <slot>
            <div class="ci-container">
                <div class="header-app-bar">
                    <div class="progress-bar-wrapper">
                        <p>{{ answersNumber }} / {{ answersLimit }}</p>
                        <div class="progress-bar">
                            <div class="progress-inner" :style="{width: '60%'}">
                            </div>
                        </div>
                    </div>

                    <div class="logo">
                        <img :src="logo"/>
                    </div>

                    <div class="nav-actions">
<!--                        <button @click="logout">logout</button>-->
                        <BaseButton :background="variables.primary" icon rounded>
                            <BaseIcon slot="pre-icon" icon="exit" :fill="variables.brown" />
                        </BaseButton>
                        <header-user-picture :src="userPic"/>
                    </div>
                </div>
            </div>
        </slot>
    </div>
</template>

<script>
export default {
    name: 'BaseHeader',
    props: {
        answersLimit: String,
        answersNumber: String,
        logo: String,
        logoutLink: String,
        userPic: String
    },
    methods: {
        logout() {
            window.location.href = this.logoutLink;
        }
    }
};
</script>

<style lang="scss" scoped>
.header {
    background: #FAF7EC;
    height: 100px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
    .header-app-bar {
        height: 100px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        align-items: center;

        .progress-bar-wrapper {
            max-width: 500px;

            p {
                font-family: 'Ubuntu', sans-serif;
                font-style: normal;
                font-weight: 300;
                font-size: 16px;
                line-height: 18px;
                color: #4F4F4F;
                margin-bottom: 10px;
            }

            .progress-bar {
                height: 15px;
                background: linear-gradient(180deg, #F0EDE3 0%, #E8E3D6 100%);
                border-radius: 30px;
                position: relative;

                .progress-inner {
                    height: 100%;
                    background: linear-gradient(180deg, #32C973 0%, #29AD62 100%);
                    box-shadow: 0px 10px 30px rgba(50, 201, 115, 0.2);
                    border-radius: 30px 0px 0px 30px;
                    position: absolute;
                    left: 0;
                    top: 0;

                }
            }

        }

        .logo {
            justify-self: center;
        }

        .nav-actions {
            justify-self: end;
            display: flex;
            column-gap: 30px;
            align-items: center;
        }
    }

    @media (max-width: 768px){
        height: 46px;
        .header-app-bar {
            grid-template-columns: 1fr 1fr;
            height: 46px;
            .progress-bar-wrapper{
                p{
                    font-weight: 300;
                    font-size: 10px;
                    line-height: 11px;
                    color: #4F4F4F;
                    margin-bottom: 5px;
                }
                .progress-bar{
                    height: 6px
                }
            }
            .logo {
                display: none;
            }
            .nav-actions {
                column-gap: 15px;
            }
        }
    }
}
</style>
