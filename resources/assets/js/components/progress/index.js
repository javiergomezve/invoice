import Vue from 'vue'

import Progress from './Progress'

const bar = Vue.prototype.$bar = new Vue(Progress).$mount();

document.body.appendChild(bar.$el)

export default bar
