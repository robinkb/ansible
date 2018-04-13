# Standard libraries
import os

# Third party
from invoke import task

@task
def dev_setup(ctx):
    ctx.run("ansible-playbook --ask-become-pass playbooks/development-setup.yaml")


@task
def lint(ctx):
    ctx.run("yamllint --strict environments/ playbooks/ roles/")

    for root, dirs, files in os.walk("playbooks/"):
        for file in files:
            if file.endswith('.yaml'):
                ctx.run("ansible-lint %s" % os.path.join("playbooks/", file))

    print("Linting successful, all good to go!")


@task
def setup(ctx):
    ctx.run("vagrant up testbox")


@task
def teardown(ctx):
    ctx.run("vagrant destroy testbox")


@task(pre=[teardown], post=[setup])
def clean(ctx):
    pass


@task(pre=[lint])
def test(ctx):
    ctx.run("ansible-playbook -i environments/development/ playbooks/playbook.yaml")


@task
def tryout(ctx):
    ctx.run("ansible-playbook -i environments/development/ playbooks/playbook.yaml --tags tryout")
