<script>
import { Doughnut } from 'vue-chartjs';

export default {
   extends: Doughnut,
   props: ['options'],
   mounted() {
         let uri = 'https://localhost/api/users';
         let Users = new Array();
         let Points = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            //console.log(data);
            if(data) {
                console.log(data);
                Users = data.username;
                Points = data.points;
                //console.log(Users);
                this.renderChart({
                labels: Users,
                datasets: [{
                    label: 'Points',
        backgroundColor: [
            pattern.draw('square', '#ff6384'),
            pattern.draw('circle', '#36a2eb'),
            pattern.draw('diamond', '#cc65fe'),
            pattern.draw('triangle', '#ffce56'),
        ],                    data: Points
                }]
            }, this.options)
        }
        else { 
            console.log('No data');
        }});
    }
}
</script>