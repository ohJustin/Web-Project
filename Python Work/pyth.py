filename = input()
file1 = open(filename)
file2 = 'output_keys.txt'
file3 = 'output_titles.txt'
contents = file1.readlines()
file1.close()
#20 - Even
#Gunsmoke - Odd 
#30 - Even
#The Simpsons - Odd
names = []
seasons = []
clean_content = []
#unordered list
for index in range(0, len(contents)): 
    clean_content.append(contents[index].rstrip('\n'))
#odd forloop (tvshow names)
for index in range(1, len(contents), 2): 
    names.append(contents[index].rstrip('\n'))
    
#odd forloop (tvshow names)
for index in range(0, len(contents), 2): 
    seasons.append(int(contents[index].rstrip('\n')))

#show_dct = {clean_content[i]: clean_content[i + 1] for i in range(0,len(clean_content), 2)}
show_dct= dict()
for i in range(0,len(clean_content),2):
    seasonnum = clean_content[i]
    if seasonnum in show_dct:
        #show_dct = clean_content[i]:clean_content[i + 1]
        show_dct[clean_content[i]] += '; ' + clean_content[i + 1]
    else:
        #
        show_dct[clean_content[i]] = clean_content[i + 1]


keyfile = open(file2, 'w')
for key in sorted(show_dct.keys()):
    #Write to output_keys.txt
    keyfile.write(f'{key} {show_dct[key]}\n')
keyfile.close()

titlefile = open(file3, 'w')
names = sorted(names)
for name in names:
    titlefile.write(name)
    titlefile.write('\n')
titlefile.close()