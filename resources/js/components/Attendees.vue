<template>
  <section class="container">
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
      <h1 class="h2">Dashboard</h1>
    </div>
    <div class="d-flex justify-content-end">
      <div class="card mx-2">
        <div class="card-body">
          <h5 class="card-title">Total Payments</h5>
          <h3>1,0000</h3>
        </div>
      </div>
      <div class="card mx-2">
        <div class="card-body">
          <h5 class="card-title">Total Payments</h5>
          <h3>1,0000</h3>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column justify-content-center mt-3 w-70 col-xs-5">
      <div class="d-flex form-group w-50">
        <b-form-select v-model="selected.area" :options="areas"></b-form-select>
        <b-form-select v-model="selected.district" :options="districts"></b-form-select>
        <b-form-select v-model="selected.assembly" :options="assemblies"></b-form-select>
      </div>
      <b-table
        :filter="filter"
        api-url="/attendee-data"
        :per-page="perPage"
        :current-page="currentPage"
        primary-key="id"
        striped
        hover
        :fields="fields"
        :items="getItems"
      ></b-table>
      <b-pagination class="ml-auto mt-2" v-model="currentPage" :total-rows="total" :per-page="perPage"></b-pagination>
    </div>
  </section>
</template>

<script>
import axios from 'axios'

export default {
  data: () => ({
    selected: { area: 0, district: 0, assembly: 0 },
    total: null,
    perPage: 4,
    currentPage: 1,
    fields: [
      { key: 'reg_no' },
      { key: 'fullname' },
      { key: 'assembly' },
      { key: 'district' },
      { key: 'area' },
      { key: 'age' },
      { key: 'payment' }
    ],
    branches: []
  }),
  methods: {
    async getItems({ apiUrl, currentPage, perPage, filter }) {
      let filterPath = filter ? `&${filter}=${this.selected[filter]}` : ''

      let { data } = await axios.get(`${apiUrl}?page=${currentPage}${filterPath}`)
      if (data.length == 0) {
        this.total = 0
        return []
        console.log('here')
      }
      this.total = data.total
      return data.data.map(row => ({ ...row, payment: Boolean(row.payment) ? 'Paid' : 'Not Paid' }))
    }
  },
  computed: {
    areas() {
      return [{ value: 0, text: 'Select Area' }].concat(
        this.branches.map(area => ({ value: area.id, text: area.name }))
      )
    },
    districts() {
      let initialOptions = [{ value: 0, text: 'Select District' }]
      //   reset the districts
      this.selected.district = 0

      return this.selected.area > 0
        ? initialOptions.concat(
            this.branches
              .find(area => area.id === this.selected.area)
              .districts.map(district => ({ value: district.id, text: district.name }))
          )
        : initialOptions
    },
    assemblies() {
      let initialOptions = [{ value: 0, text: 'Select Assembly' }]
      this.selected.assembly = 0

      return this.selected.district > 0
        ? initialOptions.concat(
            this.branches
              .find(area => area.id == this.selected.area)
              .districts.find(district => district.id == this.selected.district)
              .assemblies.map(assembly => ({ value: assembly.id, text: assembly.name }))
          )
        : initialOptions
    },
    filter() {
      let selected = Object.entries(this.selected)
        .reverse()
        .find(([field, value]) => value > 0)

      if (!selected) return null
      let [chosenFilter] = selected
      console.log('Chosen filter is ', chosenFilter)
      return chosenFilter
    }
  },
  async created() {
    let { data } = await axios.get('/branches-data')
    this.branches = data
  }
}
</script>

<style>
</style>
