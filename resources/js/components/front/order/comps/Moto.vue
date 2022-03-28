<template>
    <div class="type4">               
        <div v-if="number && number.length > 0" class="numbers">
            <span>{{ number.slice(0, 4) }}</span>
        </div>
        <div v-if="number && number.length > 0" class="letters">
            <span>{{ number.slice(4, 6) }}</span>
        </div>
        <div v-if="number && number.length > 0 && numberRegion && numberRegion.length" class="reg">
            <div class="reg-inner">
                <i>RUS</i>
                <img v-if="$parent.selected.plate.id == 5" src="/img/rus.svg"/>
            </div>
            <span>
                {{ numberRegion }}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props: ['number', 'numberRegion', 'selected'],
    data() {
        return {

        }
    }
}
</script>
