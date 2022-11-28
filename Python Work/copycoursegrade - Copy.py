import csv
# #READ file name from user.
filename = input()
content = []
names = []
global midtermone
global midtermtwo
global final
midtermone = float(0)
midtermtwo = float(0)
final = float(0)
listform = []
studentappendings = []
# #OPEN the TSV(TAB-SEPERATED-FILE) and read the student information.
with open(filename, 'r') as tsvfile:
    file = csv.reader(tsvfile,delimiter='\t')
    for row in file:
        name = row[0]
        print(name)
        # content.append(row)
        # avg = float(0)
        # mid = row[0]
        # mid2 = row[3]
        # final = row[3]
        # avg = (int(mid) + int(mid2) + int(final)) / 3
        # num = 0
        # for line in content:
        #     #names.append(line)
        #     joinedline = ' '.join(line)
        #     names.append(joinedline)
        #     #listform.append(line)
            
            
            
        #     if avg >= 90:
        #         names[num] += '  A'
        #     elif avg >= 80 and  avg < 90:
        #         names[num] += '  B'
        #     elif avg >= 70 and avg < 80:
        #         names[num] += '  C'
        #     elif avg >= 60 and avg < 70:
        #         names[num] += '  D'
        #     else:
        #         names[num] += '  F'
        #     num += 1


#file.write('\n')

#midtermone = midtermone / float(5)

#idtermtwo = midtermtwo / float(5)

#final = final / float(5)

#print(line[-1])
#print(names)

# with open('report.txt', 'w') as report:
#     for stuff in names:
#         report.write(str(stuff))
#         report.write('\n')
#     report.write('\n')
#     report.write('Averages: midterm1 {midtermone}, midterm2 {midtermtwo}, final {final}')


