<script>
import { Doughnut } from 'vue-chartjs';

export default {
   extends: Doughnut,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/gender';
         let Users = new Array();
         let Points = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
                Users = ['Male', 'Female', 'Unspecified'];
                Points = [data.Male, data.Female, data.Unspecified];
                this.renderChart({
                    labels: Users,
                    datasets: [{
                        label: 'Genders',
                        backgroundColor: ['blue', 'green', 'red'],                    
                        data: Points
                    }]
                }, this.options);
        }
        else { 
            console.log('No data');
        }});
    }
}
</script>