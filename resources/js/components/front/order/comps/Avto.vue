<template>
    <div class="type1_with_flag" :class="{ 'fw-bold' : selected.zhirniy }">               
        <div v-if="number && number.length > 0" class="numbers">
            <span>{{ number.slice(0, 1) }}</span>
            <span>{{ number.slice(1, 4) }}</span>
            <span>{{ number.slice(4, 6) }}</span>
        </div>
        <div v-if="number && number.length > 0 && numberRegion && numberRegion.length" class="reg">
            <span>
                {{ numberRegion }}
            </span>
            <div class="reg-inner">
                <i>RUS</i>
                <img v-if="$parent.selected.plate.id == 1" src="/img/rus.svg"/>
            </div>
        </div>
        <div v-if="!selected.bez_otverstiy" class="holes hole1"></div>
        <div v-if="!selected.bez_otverstiy" class="holes hole2"></div>
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
