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
        b = 0
        #name = row[0]
        # name = row[0].split()
        # #print(name[b])
        # #prints firstname
        
            content.append(row)
        # avg = float(0)
        # mid = name[2]
        # mid2 = name[2]
        # final = name[3]
        # avg = (float(mid) + float(mid2) + float(final)) / 3
            #num = 0
for line in content:
            #names.append(line)
    joinedline = ' '.join(line)
    names.append(joinedline)
            #listform.append(line)
        #names[num] += ' hey'
    #num += 1
            
            
            
        # b += 1

        # if avg >= 90:
        #     names[num] += '  A'
        # elif avg >= 80 and  avg < 90:
        #     names[num] += '  B'
        # elif avg >= 70 and avg < 80:
        #     names[num] += '  C'
        # elif avg >= 60 and avg < 70:
        #         names[num] += '  D'
        # else:
        #     names[num] += '  F'
            #num += 1
with open(filename, 'r') as tsvfile:
    file = csv.reader(tsvfile,delimiter='\t')
    for row in file:
        name = row[0].split()
        #print(name[0])

#file.write('\n')

# midtermone = midtermone / float(5)

# idtermtwo = midtermtwo / float(5)

# final = final / float(5)

# print(line[-1])
print(names)

# with open('report.txt', 'w') as report:
#     for stuff in names:
#         report.write(str(stuff))
#         report.write('\n')
#     report.write('\n')
#     report.write('Averages: midterm1 {midtermone}, midterm2 {midtermtwo}, final {final}')


