<script>
import { Line } from 'vue-chartjs';

export default {
   extends: Line,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/users';
         let Users = new Array();
         let Points = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
                Users = data.username;
                Points = data.points;
                this.renderChart({
                    labels: Users,
                    datasets: [{
                        label: 'Points',
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