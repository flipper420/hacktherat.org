<script>
import { Bar } from 'vue-chartjs';

export default {
   extends: Bar,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/new-users-count';
         let totals = new Array();
         let years = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            data.forEach(function(obj) {
                totals.push(obj.total);
                years.push(obj.year);
            });
            if(data) {
                this.renderChart({
                    labels: years,
                    datasets: [{
                        label: 'New Users',
                        backgroundColor: 'red',                    
                        data: totals
                    }]
                }, this.options);
        }
        else { 
            console.log('No data');
        }});
    }
}
</script>