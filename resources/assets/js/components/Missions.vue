<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/missions';
         let Users = new Array();
         let Points = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
                Users = data.categories;
                Points = data.count;
                this.renderChart({
                    labels: Users,
                    datasets: [{
                        label: '# of Missions',
                        backgroundColor: 'red',                    
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