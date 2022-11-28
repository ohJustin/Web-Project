class PersonData:
    def __init__(self):
        self.last_name = ''
        self.age_years = 0

    def set_name(self, user_name):
        self.last_name  = user_name

    def set_age(self, num_years):
        self.age_years = num_years

    # Other parts omitted

    def print_all(self):
        output_str = 'Name: ' + self.last_name + ', Age: ' + str(self.age_years)
        return output_str


class StudentData(PersonData):
    def __init__(self):
        PersonData.__init__(self)  # Call base class constructor
        self.id_num = 0

    def set_id(self, student_id):
        self.id_num = student_id

    def get_id(self):
        return self.id_num


course_student = StudentData()

''' Your solution goes here '''
course_student.set_name('Smith')
course_student.set_id(9999)

print(f'{course_student.print_all()}, ID: {course_student.get_id()}')