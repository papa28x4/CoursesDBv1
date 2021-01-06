<template>
  <div class="courses">
    <p class="_title0 mb-4 d-flex justify-content-end"> <Button  @click="addModal=true"><Icon type="md-add" />Add Course</Button></p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Code</th>
          <th scope="col">Title</th>
          <th scope="col">Units</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
          
        <tr v-for="(course, index) in getCourses.data" :key="course.id">
          <th scope="row">{{(index + 1) + ((getCourses.current_page-1) * getCourses.per_page)}}</th>
          <td>{{course.code}}</td>
          <td>{{course.title}}</td>
          <td>{{course.units}}</td>
          <td>
              <Button  @click="showEditModal(course)" size="small" type="info">Edit</Button>
			  <Button  @click="showDeleteModal(course)" size="small" type="error">Delete</Button>
          </td>
        </tr>
      </tbody>
    </table>
    
	<div class="pagination-cover d-flex justify-content-center">
		 <pagination :data="getCourses" @pagination-change-page="fetchCourses"></pagination>
	</div>
   
    <!--Modals-->
    <!-- Tag adding Modal -->
				<Modal
					v-model="addModal"
					title="Add Course"
					:mask-closable="false"
					:closable="true"
				>
					<div class="space mb-2">
						<Input v-model="data.code"  placeholder="Enter course code" style="width: 300px; text-align:center" type="text" />
					</div>
					<div class="space mb-2">
                    	<Input v-model="data.title" placeholder="Enter course title" style="width: 300px; text-align:center" type="text" />
					</div>

					<div class="space">
                    	<Input v-model="data.units" placeholder="Enter course units" style="width: 300px; text-align:center" type="number" />
					</div>

					<div slot="footer">
						<Button type="default" @click="addModal=false">Close</Button>
						<Button type="primary" 
								@click="add()" 
								:disabled="isAdding"
								:loading="isAdding"
						>
								{{ isAdding? 'Adding...' : 'Add Course'}}
						</Button>
					</div>
				</Modal>

				<Modal
					v-model="editModal"
					title="Edit Course"
					:mask-closable="false"
					:closable="true"
				>
					
					<div class="space mb-2">
                    	<Input v-model="editData.code" placeholder="Enter course code" style="width: 300px; text-align:center" type="text" />
					</div>
					<div class="space mb-2">
						<Input v-model="editData.title" placeholder="Enter course title" style="width: 300px; text-align:center" type="text" />
					</div>
					<div class="space">
						  <Input v-model="editData.units" placeholder="Enter course units" style="width: 300px; text-align:center" type="number" />
					</div>
                    
					<div slot="footer">
						<Button type="default" @click="editModal=false">Close</Button>
						<Button type="primary" 
								@click="edit()" 
								:disabled="isEditing"
								:loading="isEditing"
						>
								{{ isAdding? 'Editing...' : 'Update Course'}}
						</Button>
					</div>
				</Modal>

				<Modal
					v-model="deleteModal"
					title="Delete Course"
					:mask-closable="false"
					:closable="true"
				>
					<p>Are you sure want to delete this?</p>

					<div slot="footer">
						<Button type="default" @click="deleteModal=false">Close</Button>
						<Button type="error" 
								@click="remove(course)" 
								:disabled="isDeleting"
								:loading="isDeleting"
						>
								{{ isDeleting? 'Deleting...' : 'Delete Course'}}
						</Button>
					</div>
				</Modal>
    <!--End of Modals-->
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: 'students',
    data(){
        return{
            	data: {
                    code: '',
                    title: '',
                    units: ''
			},
			editData: {
				id: '',
				code: '',
                title: '',
                units: ''
			},
			deleteData: {
				id: '',
			},
			addModal : false,
			editModal : false,
			deleteModal: false,
			isAdding : false,
			isEditing: false,
			isDeleting: false
        }
    },
    computed: {
        ...mapGetters([
            'getCourses'
        ])
    },
    methods:{
        ...mapActions([
            'fetchCourses',
			'addCourse',
			'updateCourse',
			'deleteCourse'
        ]),
        async add(){
			this.isAdding = true;
			// if(this.data.tagName.trim() == '') {
			// 	this.isAdding = false;
			// 	return this.error('Tag name is required')
			// }
			const res = await this.addCourse(this.data)
			if(res.status === 200){
				this.data = {
                    code: '',
                    title: '',
                    units: ''
				}
				this.addModal = false;
				this.success('Course has been added successfully')
			}else if(res.status === 422){
				for(let key in res.data.error){
					if(res.data.error[key][0] == 'The code format is invalid.'){
						this.error(res.data.error[key][0] + '\t Enter 3 Uppercase letters followed by 3 numbers')
					}else{
						this.error(res.data.error[key][0])
					}
				}
			}else{
				this.swr()
			}
			this.isAdding = false;
		},
		async edit(){
			this.isEditing = true;
			const res = await this.updateCourse(this.editData)
			if(res.status === 200){
				this.editModal = false;
				this.success('Course has been updated successfully')
			}else if(res.status === 422){
				for(let key in res.data.error){
					if(res.data.error[key][0] == 'The code format is invalid.'){
						this.error(res.data.error[key][0] + '\t Enter 3 Uppercase letters followed by 3 numbers')
					}else{
						this.error(res.data.error[key][0])
					}
				}
			}else{
				this.swr()
			}
			this.isEditing = false;
		},
		async remove(course){
			this.isDeleting = true;
			const res = await this.deleteCourse(this.deleteData.id)
			if(res.status === 200){
				this.deleteModal = false;
				this.success('Course has been deleted')
			}else{
				this.swr();
			}
			this.isDeleting = false;
		},
		showEditModal(course){
			for(let key in course){
				this.editData[key] = course[key]
			}
			this.editModal=true
		},
		showDeleteModal(course){
			this.deleteData.id = course.id
			this.deleteModal=true
		}
    },
    mounted(){
        this.fetchCourses()
    }
}
</script>

<style >
  
  .courses{
    margin: auto;
    margin-top: 24px;
    padding: 0 32px;
  }
  .courses .table{
    border-color: #7386D5
  }
  .courses .table thead{
     background-color: #7386D5;
     color: #fff;
  }
  .page-item.active .page-link {
    background-color:rgba(115, 134, 213, 1);
    border-color: rgba(115, 134, 213, 1);
  }
  .page-item.active .page-link:hover {
    background-color:rgba(115, 134, 213, 0.8);
    border-color: rgba(115, 134, 213, 0.8);
  }

</style>