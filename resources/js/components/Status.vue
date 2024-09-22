<template>
    <transition name="fade-slide">
        <div v-if="visible" class="status-component">
            <div class="status-icon">
                <span class="icon">&#9888;</span>
            </div>

            <div class="message">
                <p>{{ message }}</p>
            </div>

            <div class="close">
                <button class="close-btn" @click="close">&#10005;</button>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true
        },
        visible: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        close() {
            this.$emit('close');
        }
    }
};
</script>

<style scoped>
/* Transitieklassen voor Vue */
.fade-slide-enter-active, .fade-slide-leave-active {
    transition: opacity 0.5s ease, transform 0.5s ease;
}

/* Startwaarden bij het verschijnen (enter) en verdwijnen (leave) */
.fade-slide-enter, .fade-slide-leave-to {
    opacity: 0;
    transform: translateY(10px);
}

/* Eindsituatie bij het verschijnen (enter) */
.fade-slide-enter-to {
    opacity: 1;
    transform: translateY(0);
}

/* Eindsituatie bij het verdwijnen (leave) */
.fade-slide-leave-active {
    opacity: 0;
    transform: translateY(10px);
}

.status-component {
    display: flex;
    align-items: center;
    width: auto;
    position: fixed;
    bottom: 20px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    background-color: white;
    padding: 10px;
}

.status-icon {
    color: white;
    background-color: red;
    font-size: 24px;
    width: 56px;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.message {
    background-color: white;
    color: black;
    margin-left: 24px;
    margin-right: 48px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    color: black;
    background-color: white;
    cursor: pointer;
    padding: 5px;
    line-height: 1;
}

.close-btn:hover {
    color: red;
}
</style>